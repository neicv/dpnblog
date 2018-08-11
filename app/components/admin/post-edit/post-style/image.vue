<template lang="html">
    <input-image-meta :image.sync="post.data.image" class="pk-image-max-height"></input-image-meta>
    hello world
</template>

<script>
export default {
    props:['post'],
}
</script>
