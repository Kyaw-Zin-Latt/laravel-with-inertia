<template>
    <Head>
        <title>Users</title>
    </Head>
    <h1 class="text-primary">Users</h1>

    <table class="table table-striped table-bordered">
        <thead>
        <tr>
            <th>#</th>
            <th>Name</th>
            <th>Setting</th>
            <th>Email</th>
        </tr>
        </thead>
        <tbody>
        <tr v-for="user in users.data" :key="user.id">
            <td>{{ user.id }}</td>
            <td>{{ user.name }}</td>
            <Link >Edit</Link>
            <td>{{ user.email }}</td>
        </tr>
        </tbody>
    </table>


</template>

<script>
    import Layout from "@/Pages/Profile/Layout";
    import Link from "@inertiajs/inertia-vue3";
    export default {
        name: "Users",
        layout : Layout,
        components : {Link},
        props: {
            users : Object
        }
    }
</script>

<style scoped>

</style>
