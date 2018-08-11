<template lang="html">
    <input-video :source.sync="post.data.video" class="pk-image-max-height"></input-video>
</template>

<script>
export default {
    props:['post'],
}
</script>
