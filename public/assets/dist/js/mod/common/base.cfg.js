/**
 * Created by qjy on 16-3-9.
 */
seajs.config({
    base: "http://www.djy181.dev/assets/dist/js/mod",
    paths: {
        'adminSrc'		: "/assets/dist/js/mod"
    },
    alias: {
        "adminsider"    : "adminSrc/admin/sider.js"
    }
});

seajs.use("adminsider");