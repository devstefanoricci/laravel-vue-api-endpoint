<template>
    <div class="table-responsive">
        <h3 class="text-center">All Users</h3><br/>
<!--        <span> {{ message }}</span>-->
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
            <tr v-for="user in users" :key="user.id">
                <td>{{ user.id }}</td>
                <td>{{ user.first_name }}</td>
                <td>{{ user.last_name }}</td>
                <td>{{ user.email }}</td>
                <td><img  v-bind:src="user.avatar" class="img-fluid"></td>
                <td>
                    <div class="btn-group" role="group">
                        <router-link :to="{name: 'show', params: { id: user.id }}" class="btn btn-primary"><i class="fas fa-search"></i>
                        </router-link>
                        <button class="btn btn-danger" @click="deleteUser(user.id)"><i class="fas fa-trash"></i></button>
                    </div>
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
                users: [],
                message: null
            }
        },
        created() {
            this.axios
                .get('http://reqres.test/api/users')
                .then(response => {
                    this.users = response.data.data;
                })
                .catch(error => console.log(error));
        },
        methods: {
            deleteUser(id) {
                this.axios
                    // .delete('http://reqres.test/api/user/delete/${id}')
                    .delete('http://reqres.test/api/user/delete/' +{id})
                    .then(response => {
                        console.log(id);
                        console.log(response.status);
                        let i = this.users.map(item => item.id).indexOf(id); // find index of your object
                        this.users.splice(i, 1);

                         // if (response.status == 204) {
                         //     this.message = 'User Deleted id ' + id;
                         //     alert('Deleted');
                         // }
                        // console.log(response.status);
                    })
                    .catch(error => console.log(error));
            }
        }
    }
</script>