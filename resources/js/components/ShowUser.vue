<template>
    <div class="table-responsive">
        <h3 class="text-center">Show User</h3>
                <table class="table table-bordered table-sm">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Lastname</th>
                        <th>Email</th>
                        <th>Avatar</th>
                        <th>Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td>{{ user.id }}</td>
                        <td>{{ user.first_name }}</td>
                        <td>{{ user.last_name }}</td>
                        <td>{{ user.email }}</td>
                        <td><img  v-bind:src="user.avatar" class="img-fluid"></td>
                    <td><button class="btn btn-primary" onclick="javascript:history.back()">Back to list</button></td>
                    </tr>
                    </tbody>
                </table>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                user: {},
            }
        },
        created() {
             console.log('http://reqres.test/api/user/show/'+this.$route.params.id);
            this.axios
                .get('http://reqres.test/api/user/show/'+this.$route.params.id)
                .then((response) => {
                    // console.log(this.$route.params.id);
                    this.user = response.data.data;
                    // console.log(response.data.data);
                })
                .catch(error => console.log(error));
        }
    }
</script>