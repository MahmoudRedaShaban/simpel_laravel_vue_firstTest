<template>
    <div>
        <span class="badge bg-success">ِAddnew: {{ this.title }}</span>
    </div>
</template>

<script>
    export default {
        name:"NotesAction",
        data() {
            return {
                title:''
            }
        },
        methods: {
            getnewAdd () {
                window.Echo.channel('NotesPublic')
                    .listen('NotesEvent' , (e)=>{
                        this.title = e.methods;
                    });
            },
        },
        created() {
            this.getnewAdd();
        },
    }
</script>

<style  scoped>

</style>
