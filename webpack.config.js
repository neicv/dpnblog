module.exports = [

    {
        entry: {
          "admin-categories": "./app/views/admin/admin-categories.js",
          "admin-posts": "./app/views/admin/admin-posts.js",
          "admin-post-edit": "./app/views/admin/admin-post-edit.js",
          "admin-settings": "./app/views/admin/admin-settings.js",
          "dpnblog-posts": "./app/views/dpnblog-posts.js",
          "link-blog": "./app/components/link-blog.vue",
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
