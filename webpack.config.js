module.exports = [

    {
        entry: {
          "admin-categories": "./app/views/admin/admin-categories.js",
          "admin-posts": "./app/views/admin/admin-posts.js",
          "admin-post-edit": "./app/views/admin/admin-post-edit.js",
          "admin-settings": "./app/views/admin/admin-settings.js",
          "dpnblog-posts": "./app/views/dpnblog-posts.js",
          "link-dpnblog": "./app/components/link-blog.vue",
          "categories-widget": "./app/components/widgets/categories.vue",
          "tags-widget": "./app/components/widgets/tags.vue",
        },
        output: {
            filename: "./app/bundle/[name].js"
        },
        module: {
            loaders: [
                { test: /\.vue$/, loader: "vue" }
            ]
        }
    }

];
