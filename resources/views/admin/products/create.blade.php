<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://unpkg.com/element-ui/lib/theme-chalk/index.css">
    <script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>
    <script src="https://unpkg.com/element-ui/lib/index.js"></script>
    <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
    <script type="text/javascript" charset="utf-8" src="/ueditor/ueditor.config.js"></script>
    <script type="text/javascript" charset="utf-8" src="/ueditor/ueditor.all.min.js"> </script>
    <!--建议手动加在语言，避免在ie下有时因为加载语言失败导致编辑器加载失败-->
    <!--这里加载的语言文件会覆盖你在配置项目里添加的语言类型，比如你在配置项目里配置的是英文，这里加载的中文，那最后就是中文-->
    <script type="text/javascript" charset="utf-8" src="/ueditor/lang/zh-cn/zh-cn.js"></script>
    <title>Document</title>
</head>
<style>
    input[type=file] {
         display: none;
    }
    .avatar-uploader .el-upload {
        border: 1px dashed #d9d9d9;
        border-radius: 6px;
        cursor: pointer;
        position: relative;
        overflow: hidden;
    }
    .avatar-uploader .el-upload:hover {
        border-color: #409EFF;
    }
    .avatar-uploader-icon {
        font-size: 28px;
        color: #8c939d;
        width: 178px;
        height: 178px;
        line-height: 178px;
        text-align: center;
    }
    .avatar {
        width: 178px;
        height: 178px;
        display: block;
    }
</style>
<body>
    <div id="app">
        <div style="width:60%;margin:0 auto;">
            <el-form :model="productForm" :rules="productRules" ref="productForm" label-width="100px">
                <el-form-item label="商品名称：" prop="title">
                    <el-input v-model="productForm.title" placeholder="商品名称"></el-input>
                </el-form-item>
                <el-form-item label="商品分类：" prop="product_classify_id">
                    <el-select style="width:100%;" v-model="productForm.product_classify_id" placeholder="商品分类">
                        <el-option v-for="item in secondRootClassify" :label="item.text" :key="item.id" :value="item.id"></el-option>
                    </el-select>
                </el-form-item>
                <el-form-item label="封面图片：" prop="image">
                    <el-upload
                        class="avatar-uploader"
                        action="/admin/uploadImage"
                        :show-file-list="false"
                        :on-success="handleAvatarSuccess"
                        :before-upload="beforeAvatarUpload">
                        <img v-if="productForm.image" :src="productForm.image" class="avatar">
                        <i v-else class="el-icon-plus avatar-uploader-icon"></i>
                    </el-upload>
                </el-form-item>
                <el-form-item label="商品描述：">
                    <script id="editor" type="text/plain" style="width:1024px;height:500px;"></script>
                    <span V-if="error" v-text="errors.description[0]" style="color:#F56C6C"></span>
                </el-form-item>
                <el-form-item label="是否上架：" prop="on_sale">
                    <el-switch v-model="productForm.on_sale"></el-switch>
                </el-form-item>
                <el-form-item>
                    <el-button :loading="submiting" type="primary" @click="submitForm('productForm')">确定</el-button>
                </el-form-item>
            </el-form>
        </div>
    </div>
</body>
</html>
<script>
    var ue = UE.getEditor('editor');
    new Vue({
        el:'#app',
        data:{
            productForm:{
                title:'',
                product_classify_id:'',
                image:'',
                description:'',
                on_sale:false,
            },
            productRules:{
                title: [
                    { required: true, message: '请输入商品名称', trigger: 'blur' }
                ],
                product_classify_id: [
                    { required: true, message: '请选择商品分类', trigger: 'blur' }
                ],
                image: [
                    { required: true, message: '请上传封面图', trigger: 'blur' }
                ],
            },
            secondRootClassify:[],
            imageUrl:'',
            error:false,
            errors:{},
            submiting:false,
        },
        created(){
            this.getSecondRootClassify();
        },
        methods:{
            handleAvatarSuccess(res, file) {
                this.productForm.image = file.response.path;
            },
            beforeAvatarUpload(file) {
                const isLt2M = file.size / 1024 / 1024 < 2;
                if (!isLt2M) {
                    this.$message.error('上传头像图片大小不能超过 2MB!');
                }
                return isLt2M;
            },
            getSecondRootClassify(){
                axios.get('/admin/productClassify/getSecondRootClassify').then(res =>{
                    this.secondRootClassify = res.data;
                });
            },
            handleRemove(file, fileList) {
                console.log(file, fileList);
            },
            handlePictureCardPreview(file) {
                this.imageDialogImageUrl = file.response.path;
                console.log(this.imageDialogImageUrl);
                this.imageDialogVisible = true;
            },
            handleSuccess(response, file, fileList){
                this.productForm.image = file.response.path;
            },
            submitForm(formName) {
                this.submiting = true;
                this.productForm.description = ue.getContent();
                this.$refs[formName].validate((valid) => {
                    if (valid) {
                        axios.post('/admin/products',this.productForm).then(res => {
                            this.submiting = false;
                            window.location.href = "/admin/products";
                        }).catch(error => {
                            this.error = true;
                            this.errors = error.response.data.errors;
                            this.submiting = false;
                        });
                    } else {
                        return false;
                    }
                });
            },
        },
    });
</script>