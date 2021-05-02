<template>
    <div>
        <div
            class="modal fade"
            id="exampleModal"
            tabindex="-1"
            role="dialog"
            aria-labelledby="exampleModalLabel"
            aria-hidden="true"
        >
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">{{ this.title }}</h5>
                        <button
                            type="button"
                            class="close"
                            data-dismiss="modal"
                            aria-label="Close"
                        >
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <p>{{ this.body }}</p>
                    </div>
                    <div style="position: relative;" class="modal-footer">
                <p style="position: absolute; ;left:10px;">Date: {{ data.date?data.date: '22/2/2021' }}</p>
                        <button
                            type="button"
                            class="btn btn-secondary"
                            data-dismiss="modal"
                        >
                            Close
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: "showModel",
    props: ["data"],
    data() {
        return {
            title: "",
            body: "",
            date: ""
        };
    },
    created() {
        this.title = this.$props.data.title;
        this.body = this.$props.data.body;
        this.date = this.$props.data.date;
        $('#exampleModal').modal('hide')
    }
};
</script>

<style scoped></style>
