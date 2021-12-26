<template>
    <Head>
        <title>User - Edit</title>
    </Head>
    <h3 class="text-primary my-3">Edit Page</h3>
    <div class="col-6">
        <form @submit.prevent="submit()" action="">
            <div class="">
                <label for="">User Name</label>
                <input type="text" v-model="form.name" :class="['form-control',{'is-invalid' : errors.name}]">
                <small class="fw-bold text-danger">{{ errors.name }}</small>
            </div>
            <div class="">
                <label for="">User Email</label>
                <input type="text" v-model="form.email" :class="['form-control',{'is-invalid' : errors.email}]">
                <small class="fw-bold text-danger">{{ errors.email }}</small>
            </div>
            <button class="btn btn-outline-primary mt-2">Update</button>
        </form>
    </div>
</template>

<script>
    import Layout from "@/Pages/Profile/Layout";
    export default {
        name: "Edit",
        layout : Layout,
        props: ['errors','user'],
        data() {
            return {
                form: {
                    name: this.user.name,
                    email: this.user.email,
                }
            }
        },
        methods: {
            submit() {
                this.$inertia.put(route('user.update',this.user.id),this.form);
            }
        },
    }
</script>

<style scoped>

</style>
