module.exports = [

    {
        entry: {
          "admin-categories": "./app/views/admin/admin-categories.js",
          "admin-posts": "./app/views/admin/admin-posts.js",
          "admin-post-edit": "./app/views/admin/admin-post-edit.js",
          "admin-settings": "./app/views/admin/admin-settings.js"
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
