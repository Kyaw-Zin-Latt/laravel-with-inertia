<template>

    <nav aria-label="Page navigation example">
        <ul class="pagination">
            <li
                :class="[
                    'page-item',
                    {'active' : link.active,'disabled' : link.url == null}
                    ]"
                v-for="link in users.links">
                <Link
                    class="page-link"
                    :href="link.url" v-html="link.label"
                />
            </li>
        </ul>
    </nav>

</template>

<script>
    export default {
        name: "Pagination",
        props: {
            users : Object
        }
    }
</script>

<style scoped>

</style>
