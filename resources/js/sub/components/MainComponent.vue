<template>
    <div>
        <h2 class="mt-4 text-center">Welcom In Component Test ma</h2>
        <welcom-component v-for="blog in blogs" :key="blog.id" :data="blog"></welcom-component>
    </div>
</template>

<script>
import WelcomComponent from './WelcomComponent.vue'
    export default {
  components: { WelcomComponent },
        name:'MainComponent',
        data() {
            return {
                blogs:[]
            }
    },
     methods: {

            async getAllBlogs(){
            await axios.get('api/articals').then((response) => {
                this.blogs =response.data ;
            }).catch((errors)=>{
                console.log(errors);
            });

            console.log(this.blogs);
            },

        },
        created() {
            this.getAllBlogs();
        },
    }
</script>

<style lang="scss" scoped>

</style>
