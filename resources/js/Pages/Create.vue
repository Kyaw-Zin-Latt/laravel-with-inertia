<template>
    <Head>
        <title>User - Create</title>
    </Head>
    <h3 class="text-primary my-3">Create Page</h3>
    <div class="col-6">
        <form @submit.prevent="submit()" action="">
            <div class="">
                <label for="">User Name</label>
                <input type="text" v-model="form.name" :class="['form-control',{'is-invalid' : errors.name},{'is-valid' : !errors.name && form.name != ''}]">
                <small class="fw-bold text-danger">{{ errors.name }}</small>
            </div>
            <div class="">
                <label for="">User Email</label>
                <input type="text" v-model="form.email" :class="['form-control',{'is-invalid' : errors.email}]">
                <small class="fw-bold text-danger">{{ errors.email }}</small>
            </div>
            <div class="">
                <label for="">User Password</label>
                <input type="text" v-model="form.password" :class="['form-control',{'is-invalid' : errors.password}]">
                <small class="fw-bold text-danger">{{ errors.password }}</small>
            </div>
            <div class="">
                <label for="">User Photo</label>
                <input type="file" @input="form.photo = $event.target.files[0]" :class="['form-control',{'is-invalid' : errors.photo}]">
                <small class="fw-bold text-danger">{{ errors.photo }}</small>
            </div>
            <button class="btn btn-outline-primary mt-2">Save</button>
        </form>
    </div>
</template>

<script>
    import Layout from "@/Pages/Profile/Layout";
    import { useForm } from '@inertiajs/inertia-vue3';
    export default {
        name: "Create",
        layout : Layout,
        props: ['errors'],
        data() {
            return {
                form: useForm({
                    name: '',
                    email: '',
                    password: '',
                    photo: '',
                })
            }
        },
        methods: {
            submit() {
                this.$inertia.post('/user',this.form);
            }
        },
    }
</script>

<style scoped>

</style>
