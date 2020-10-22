<template>
    <div class="row">
            <div class="col-sm-12">
                <h1 class="display-3">Users </h1>
                <span> {{ message }}</span>
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <td>ID</td>
                        <td>First name</td>
                        <td>Last name</td>
                        <td>Email</td>
                        <td>avatar</td>

                        <td colspan = 2>Actions</td>
                    </tr>
                    </thead>
                    <tbody>

                    <tr v-for="user in users">
                        <td>{{ user.id }}</td>
                        <td>{{ user.first_name }}</td>
                        <td>{{ user.last_name}}</td>
                        <td>{{ user.email }}</td>

                        <td><img  v-bind:src="user.avatar" class="img-fluid"></td>

                        <td>
<!--                            <a v-bind:href=" 'https://reqres.in/api/users/'+ user.id " v-bind:title="title" class="btn btn-secondary" ><i class="fas fa-search"></i> </a>-->
                            <a v-bind:href=" 'https://reqres.in/api/users/'+ user.id " v-bind:title="title" class="btn btn-secondary" ><i class="fas fa-search"></i> </a>
                        </td>
                        <td>
<!--                            <form action="#" method="post">-->
<!--                                @csrf-->
<!--                                @method('DELETE')-->
<!--                                <button class="btn btn-danger"><i class="fas fa-trash" ></i></button>-->
<!--                            </form>-->
                            <button class="btn btn-danger" @click="deleteUser(user.id)">Delete</button>
                        </td>
                    </tr>

                    </tbody>
                </table>

            </div>

        </div>
</template>

<script>
    export default {
        data: function () {
            return {
                users: [],
                title: "Data title",
                message:null,
                endpoint: "https://reqres.in/api/users/"
                }
            },

        mounted() {
            this.index();
            console.log('Frontpage mounted.');
            // this.deleteUser(user.id);
        },

        methods: {
            index: function() {
                // carico API
                axios.get('https://reqres.in/api/users')
                // assegno this.users
                    .then(  (response) => {
                        // console.log(response.data.data);
                         this.users = response.data.data;   // private variable
                        this.status = '';
                })
                    // controllo errori
                    .catch( function (error) {
                        console.log(error);
                    });
            },
            deleteUser: function (id) {
                axios.delete('https://reqres.in/api/users',  {
                    data: {id}
                })
                    .then( (response) => {
                        if (response.status == 204) {
                            this.message = 'User Deleted id ' + id;
                            alert('Deleted');
                        }
                        console.log(response.status);
                    })
                    .catch( function (error) {
                        console.log(error);
                    });

            }
        }

    }
</script>