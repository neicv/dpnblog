<template lang="html">
    <div class="uk-text-small uk-margin-small">
        <textarea id="pixabay" class="uk-clearfix"></textarea>
    </div>
</template>

<script>
export default {
    props:['post'],

    data:function(){
        return {
            source: []
        }
    },

    ready:function(){
        this.getTags();
        this.tagsInput();
    },

    methods:{

        tagsInput:function(){
            $('#pixabay').tagEditor({
                initialTags: this.source,
                autocomplete: {
                   delay: 0, // show suggestions immediately
                   source:this.source
                },
                forceLowercase: false,
                placeholder: 'Add Tags'
            });
        },

        getTags:function(){
            this.$http.get('admin/apidpnblog/tags/gettags').then(res => {
                if (res.data.status == 200) {
                    var arrayGet = res.data.data;
                    for (var tagsKey in arrayGet) {
                        this.source.push(arrayGet[tagsKey]);
                    }
                    UIkit.notify(res.data.msg , 'primary');
                }else {
                    UIkit.notify(res.data.msg , 'danger');
                }
            })
        },
    }
}
</script>
