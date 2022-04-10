<template>
  <div class="card">
    <div class="card-body" v-if="towns_array.length">
      <div class="row">
        <div class="col-md-12" v-for="(mytown, m) in towns_array" :key="m">
          <div class="form-group">
            <label>
              {{ mytown.name }}
            </label>
            <Select multiple transfer v-model="mytown.supervisors">
              <Option
                v-for="(supervisor, s) in supervisors_array"
                :key="s"
                :value="supervisor.id"
                >{{ supervisor.user.name }}</Option
              >
            </Select>
          </div>
        </div>
      </div>
    </div>
    <div class="card-body" v-else>
      <h4 class="h4 text-center">
        All towns are allocated,
        <a href="/admin/supervisors/attach_students">click here to view</a>
      </h4>
    </div>
    <div class="card-footer bg-light" v-if="towns_array.length">
      <button
        @click="submitForm"
        :disabled="saving"
        class="btn btn-sm btn-success float-right"
      >
        {{ saving ? "Saving..." : "Save" }}
      </button>
    </div>
  </div>
</template>
<script>
export default {
  data() {
    return {
      towns_array: [],
      supervisors_array: [],
      saving: false,
    };
  },
  props: ["towns", "supervisors"],
  methods: {
    validateForm() {
      var error = 0;
      this.towns_array.forEach((town) => {
        if (!town.supervisors.length) {
          this.$show_error_message(`${town.name} has no allocated supervisor`);
          error = 1;
        }
      });
      return error;
    },
    async submitForm() {
      if (this.validateForm() == 1) {
        return;
      } else {
        this.saving = true;
        const res = await this.callApi(
          "post",
          "/admin/towns/allocate_supervisors",
          { towns: this.towns_array }
        );
        switch (res.status) {
          case 201:
            this.$show_success_message("Towns Allocated Successfully");
            setTimeout(function () {
              window.location = "/admin/supervisors/attach_students";
            }, 500);
            break;
          case 422:
            this.$show_validation_errors(res);
            break;

          default:
            this.$show_error_message("Unexpected Error Occured");
            break;
        }
        this.saving = false;
      }
    },
  },
  created() {
    let t = [];
    this.towns.forEach((town) => {
      let obj = {
        name: town,
        supervisors: [],
      };
      t.unshift(obj);
    });
    this.towns_array = t;

    let s = [];
    this.supervisors.forEach((supervisor) => {
      s.unshift(supervisor);
    });
    this.supervisors_array = s;
  },
};
</script>