<template>
    <div>
        <show-model :data="dataall"/>
        <div class="row card item-align-center my-4">
            <div class="col-md-8 offset-md-2 ">
                <div class="card-header ">
                    <h3> {{ this.$props.data.title }}</h3>
                </div>
                <div class="card-body">
                    <p>
                        {{ this.$props.data.body }}
                    </p>
                </div>
                <div class="card-footer">
                    <div class="row ">
                        <div class="col-md-4">
                            <p><span>Author : Admin  Date   {{ this.$props.data.date }}</span>
                            </p>
                        </div>
                        <div class="col-md-2 offset-md-6">
                            <a  data-toggle="modal" data-target="#exampleModal" class="btn btn-info">more..</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    props:['data'],
    data() {
        return {
            dataall:[]
        }
    },
    created() {
        this.dataall = this.$props.data;
    },
};
</script>

<style scoped></style>
