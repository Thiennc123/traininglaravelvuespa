<template>
  <div>
    <router-link :to="{ name: 'users.add' }" class="btn btn-primary">Create Post</router-link>
    <table class="table">
      <thead>
        <tr>
          <th scope="col">#</th>
          <th scope="col">Name</th>
          <th scope="col">Email</th>
          <th scope="col">Actions</th>
        </tr>
      </thead>
      <tbody>
        <tr v-for="user in users" :key="user.id">
          <th scope="row">{{user.id}}</th>
          <td>{{user.name}}</td>
          <td>{{user.email}}</td>
          <td>
              <router-link :to="{ name: 'users.edit', params: { id: user.id } }" class="btn btn-success">Edit User</router-link>
              <button @click="deleteUser(user.id)" type="button" class="btn btn-danger" >Remove</button>
          </td>
        </tr>
      </tbody>
    </table>
  </div>
</template>

<script>
export default {
    data() {
        return {
            dem:0,
        }
    },
    methods:{
        deleteUser(id){
            if(confirm("Do you really want to delete?")){
                this.$store.dispatch("user/deleteUser", id);
                this.$router.go();
            }
        }
    },
    computed:{
        users(){
            return this.$store.getters['user/tobin'];
        },
    },
    created() {
        this.$store.dispatch("user/getUsers");
    },
};
</script>

<style>
</style>