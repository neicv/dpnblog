<template lang="html">
    <div class="uk-text-small uk-margin-small">
        <p v-if="tags">

        </p>
        <span class="uk-badge uk-badge-success">Hello World</span>
    </div>
</template>

<script>
export default {
    props:['post' , 'tags'],
}
</script>
