<template>
    <form @submit.prevent="addUser">
        <div class="form-group">
            <label for="exampleInputEmail1">Name</label>
            <input v-model="user.name" type="text" class="form-control" id="exampleInputName" aria-describedby="emailHelp" placeholder="Enter Name">
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1">Email address</label>
            <input v-model="user.email" type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
            <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
        </div>
        <div class="form-group">
            <label for="exampleInputPassword1">Password</label>
            <input v-model="user.password" type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</template>

<script>
export default {
    data(){
        return {
          user:{}
        }
    },
    methods: {
      addUser(){
        this.$store.dispatch("user/addUsers", this.user);
        this.$router.push({ name: "users" });
      }
    }
  }
</script>

<style>

</style>