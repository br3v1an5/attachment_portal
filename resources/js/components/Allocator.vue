<template>
  <div class="card">
    <div class="card-body" v-if="result_array.length">
      <div class="row">
        <div class="col-md-6" v-for="(mytown, m) in result_array" :key="m">
          <div class="form-group">
            <label>
              {{ mytown.name }}
            </label>
            <input
              v-model="mytown.amount"
              type="text"
              class="form-control"
              :placeholder="mytown.name"
            />
          </div>
        </div>
      </div>
    </div>
    <div class="card-body" v-else>
      <h4 class="h4 text-center">
        All towns are allocated,
        <a href="/admin/towns/view">click here to view</a>
      </h4>
    </div>
    <div class="card-footer bg-light" v-if="result_array.length">
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
      result_array: [],
      saving: false,
    };
  },
  props: ["towns_array"],
  methods: {
    async submitForm() {
      this.saving = true;
      let data = {
        data: this.result_array,
      };
      const res = await this.callApi(
        "post",
        "/admin/towns/allocate_funds",
        data
      );
      switch (res.status) {
        case 201:
          this.$show_success_message("Towns Allocated Successfully");
          setTimeout(function () {
            window.location = "/admin/towns/view";
          }, 1500);
          break;
        case 422:
          this.$show_validation_errors(res);
          break;

        default:
          this.$show_error_message("Unexpected Error Occured");
          break;
      }
      this.saving = false;
    },
  },
  created() {
    let t = [];
    this.towns_array.forEach((town) => {
      t.unshift(town);
    });
    this.result_array = t;
    return t;
  },
};
</script>