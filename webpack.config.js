module.exports = [

    {
        entry: {
          "admin-categories": "./app/views/admin/admin-categories.js"
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
