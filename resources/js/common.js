export default {
    data() {
        return {

        }
    },
    methods: {
        $show_success_message(message) {
            this.$Message.success({
                background: true,
                content: message,
                duration: 5,
                closable: true
            });
        },
        $show_error_message(message) {
            this.$Message.error({
                background: true,
                content: message,
                duration: 10,
                closable: true
            });
        },
        $show_validation_errors(res) {
            for (let i in res.data.errors) {
                this.$show_error_message(res.data.errors[i][0])
            }
        },
        async callApi(method, url, dataObj) {
            try {
                return await axios({
                    method: method,
                    url: url,
                    data: dataObj
                });
            } catch (e) {
                return e.response
            }
        }
    }
}