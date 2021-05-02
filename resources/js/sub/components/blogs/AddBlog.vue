<template>
    <div>
        <div class="row my-4 card">
            <div class="card-header">
                <h2>Add New Blog </h2>
            </div>
            <div class="card-body">
                <form @submit.prevent="onSubmit">
                    <div class="form-group">
                      <label for="title">Title</label>
                      <input type="text" v-model="form.title" :class="{'is-invalid' : form.errors.has('title')}" class="form-control" placeholder="Title">
                      <small class="text-danger pt-3 pb-3" style="font-size:20px;" v-if="form.errors.has('title')" v-text="form.errors.get('title')"></small>
                    </div>
                    <div class="form-group">
                      <label for="body">Body</label>
                      <textarea v-model="form.body" :class="{'is-invalid' : form.errors.has('body')}" class="form-control" name="body" id="body" rows="5"></textarea>
                      <small class="text-danger pt-3 pb-3" style="font-size:20px;" v-if="form.errors.has('body')" v-text="form.errors.get('body')"></small>
                    </div>
                      <input type="hidden" v-model="form.id" >
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
        <div class="row card my-2" v-for=" blog in blogs" :key="blog.id">
            <blog-component :allData="blog" @deleteBlog="deleteBlog(blog)" @updateBlog="updateBlog(blog)"></blog-component>
        </div>

    </div>
</template>

<script>
export default {
    name:"AddBlog",
    data() {
        return {
            form: new Form({
                title:'',
                body: '',
                id: 0
            }),
            blogs:[],
            blog_id:0
        }
    },
    methods: {
        onSubmit(){
            let data = new FormData();
            data.append('title',this.form.title);
            data.append('body',this.form.body);
            if(this.form.id >0 ){
                axios.put(`/api/articals/${this.form.id}`,{"title":this.form.title, "body":this.form.body}).then((res)=>{
                this.form.reset();
                this.getAllBlogs();
                }).catch((error)=> {
                    console.log(data);
                    this.form.errors.record(errors.response.data.errors)
                });
            }else{
                axios.post('/api/articals',data).then((res)=>{  //TODO PATH POST[ /api/articals ]
                this.form.reset()
                //TODO refresh Data
                this.getAllBlogs();
                }).catch((error)=> {
                    this.form.errors.record(errors.response.data.errors)
                });
            }

        },
        async getAllBlogs(){
            this.blogs = [];
            await axios.get('api/articals').then((response) => {
                this.blogs =response.data ;
            }).catch((errors)=>{
                console.log(errors);
            });

            console.log(this.blogs);
        },
        async deleteBlog(blog){
            await axios.delete(`api/articals/${blog.id}`).then((response) => {
                this.getAllBlogs();
            }).catch((errors)=>{
                console.log(errors);
            });
        },
        updateBlog(blog){
            alert(blog.title);
            this.form.title= blog.title;
            this.form.body = blog.body;
            this.form.id = blog.id;
            this.updateBlog = true;
        },
        async login () { //TODO Handel login In Project
        await axios
        .post("api/login", {
          username: this.username,
          password: this.password
        })
        .then(response => {
          if (response.data.token != null) {
            localStorage.setItem("token", response.data.token);
            //PUSH SECOND PAGE
          }
        })
         },
         function () {  }
    },
    created() {
        this.getAllBlogs();
    },
}
</script>

<style  scoped>

</style>
