<template>
    <Head>
        <title>Users</title>
    </Head>


    <div class="d-flex justify-content-between align-items-center">
        <h3 class="text-primary my-3 fw-bolder">Users List</h3>
        <Link class="btn btn-outline-primary" :href="route('user.create')">New User Create</Link>
    </div>

    <div class="d-flex">
        <div class="col-4 mb-3">
            <input class="form-control" @keyup="search()" v-model="searchKey" placeholder="Type Something ..." type="text">
        </div>

        <div class="col-3 mx-2">
            <select @click="order()" class="form-select" v-model="selected">
                <option v-for="option in options" :value="option.value">{{ option.text }}</option>
            </select>
        </div>
    </div>

    <div :class="[{'d-none' : isMessage}]">
        <p class="alert alert-success">
            {{ message }}
        </p>
    </div>

    <div class="">
        <table class="table table-striped table-bordered">
            <thead>
            <tr>
                <th>#</th>
                <th>Name</th>
                <th>Image</th>
                <th>Setting</th>
                <th>Email</th>
            </tr>
            </thead>
            <tbody>
            <tr v-for="user in users.data" :key="user.id">
                <td>{{ user.id }}</td>
                <td>{{ user.name }}</td>
                <td>
                    <img class="rounded-circle" v-if="user.profile_photo_path == null" :src="user.profile_photo_url" alt="">
                    <img class="rounded-circle circle" v-else :src="path+user.profile_photo_path" alt="">
                </td>
                <td>
                    <Link class="btn btn-outline-warning me-2" :href="'/user/'+user.id+'/edit'">Edit</Link>
                    <button @click="destroy(user.id)" class="btn btn-outline-danger">Delete</button>
                </td>
                <td>{{ user.email }}</td>
            </tr>
            </tbody>
        </table>
    </div>

<!--    pagination start-->
    <Pagination :users="users"></Pagination>
<!--    pagination end-->


</template>

<script>
    import Layout from "@/Pages/Profile/Layout";
    import Pagination from "@/Pagination";
    export default {
        name: "Users",
        components: {Pagination},
        layout : Layout,
        props: ['users','search','photo_path'],
        data() {
            return {
                isMessage: true,
                searchKey : this.search,
                selected : 'selected',
                options: [
                    { text: 'Open this slect', value: 'selected' },
                    { text: 'ASC', value: 'asc' },
                    { text: 'DESC', value: 'desc' }
                ]
            }
        },
        methods: {
            destroy(id) {
                this.$inertia.delete(`/user/${id}`)
            },
            search() {
                console.log(this.key)
                this.$inertia.get(`/users/?search=${this.searchKey}`,{},{
                    preserveState: true,
                    replace: true
                })
            },
            order() {
                console.log("aa")
                this.$inertia.get(`/users/?order=${this.selected}`,{},{
                    preserveState: true,
                    replace: true
                })
            }
        },
        computed: {
            message() {
                let message = this.$page.props.flash.message;
                if (message != null) {
                    this.isMessage = false
                }
                return message;
            },
            path() {
                return this.photo_path+"/";
            }
        },
    }
</script>

<style scoped>

    .circle{
        width: 60px;
        height: 60px;
        border-radius: 50%;
    }

</style>
