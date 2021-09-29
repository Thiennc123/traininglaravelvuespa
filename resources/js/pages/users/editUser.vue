<template>
    <form @submit.prevent="update">
        <div class="form-group">
            <label for="exampleInputEmail1">Name</label>
            <input v-model="user.name" type="text" class="form-control" id="exampleInputName" aria-describedby="emailHelp" placeholder="Enter Name">
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1">Email address</label>
            <input v-model="user.email" type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</template>

<script>
export default {
    data(){
        return {
            id: this.$route.params.id,
        }
    },
    methods: {
        update(){
            this.$store.dispatch("user/updateUser", this.user);
            this.$router.push({ name: "users" });
        }
    },
    computed:{
        user(){
            return this.$store.state.user.user;
        }
    },
    created() {
        this.$store.dispatch("user/getUser", this.id);
    },
  }
</script>

<style>

</style>