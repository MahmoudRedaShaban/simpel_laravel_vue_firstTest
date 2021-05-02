<template>
    <div id="card">
        <show-model :data="data"/>
        <div class="card-header container ">
            <div class="row">
                <h3 class="card-title col-md-8 pt-2">
                    {{ data.title ? data.title : "Tes Title For Site" }}
                </h3>
                <span class="col-md-2 offset-md-2"
                    >Author : {{ data.author ? data.author : "Admin" }}</span
                >
            </div>
        </div>
        <div class="card-body ">
            <p>
                {{ data.body?data.body: "Lorem ipsum dolor sit amet consectetur adipisicing elit. Commodi "
                +"incidunt officiis aut nesciunt id vero tempore corporis "
                +"temporibus placeat, ad quod provident est dignissimos quos "
                +"perferendis veritatis eaque quia ipsa?" }}
            </p>
        </div>
        <div class="card-footer container-fluid flote-blog">
            <div class="row">
                <p class="col-md-4">Date: {{ data.date?data.date: '22/2/2021' }}</p>
                <div class="col-md-4 offset-md-4 ">
                    <a class="btn btn-danger px-4  ml-2" @click="deletef(data)">Delete</a>
                    <a class="btn btn-info px-4  ml-2" @click.prevent="updatef(data)">Update</a>
                    <a data-toggle="modal" data-target="#exampleModal" class="btn btn-outline-primary px-4  ml-2">Display</a>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import showModel from './showModel.vue';
export default {
  components: { showModel },
    name: "blogComponent",
    props:['allData'],
    data() {
        return {
            data: {
                title: "",
                body: "",
                author: "",
                date: "",
                id: ""
            },
        };
    },
    methods: {
        updatef(data){
            this.$emit('updateBlog',[data]);
        },
        displayf(data){
            console.log(data);
            $('#myModal').on('shown.bs.modal', function () {
            $('#myInput').trigger('focus')
            });
        },
        deletef(data){
            this.$emit('deleteBlog',[data]);
        }
    },
    created() {
        this.data = this.$props.allData;
        console.log(this.$props);
    }
};
</script>

<style scoped>
#card {
    position: relative;
}
.flote-blog{
    position: absolute;
    bottom: 0;
}
</style>
