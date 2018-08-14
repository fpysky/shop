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
    <div style="width:77%;margin:0 auto;">
        <el-form :model="productForm" :rules="productRules" ref="productForm" label-width="140px">
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
            <el-form-item label="展示图：">
                <p>
                    <el-input v-model="imagesValue" style="width:140px;" placeholder="输入颜色"></el-input>
                    <el-button icon="el-icon-plus" @click="addImages(imagesValue)">添加</el-button>
                    <el-button @click="updateColor" type="primary">保存</el-button> <span style="color:#F56C6C">(需要保存才能执行添加sku操作)</span>
                </p>
                <p v-for="(item,index) in productForm.images">
                    <el-tag v-text="item.value"></el-tag>
                    <el-upload
                        action="/admin/uploadImage"
                        list-type="picture-card"
                        :file-list="item.images"
                        :on-preview="handlePictureCardPreview"
                        :on-success="((res, file,fileList)=>{handleImagesSuccess(res, file,fileList,item)})"
                        :on-remove="handleRemove">
                        <i class="el-icon-plus"></i>
                    </el-upload>
                </p>
            </el-form-item>
            <el-form-item label="商品描述：">
                <script id="editor" type="text/plain" style="100%;height:500px;"></script>
                <span V-if="error" v-text="errors.description[0]" style="color:#F56C6C"></span>
            </el-form-item>
            <el-form-item label="是否上架：" prop="on_sale">
                <el-switch v-model="productForm.on_sale"></el-switch>
            </el-form-item>
            <el-form-item
                v-for="(attributes, index) in productForm.attributes"
                :label="'商品sku类别' + index + ':'"
                :key="attributes.key"
                :prop="'attributes.' + index + '.name'"
                :rules="{required: true, message: '商品sku类别', trigger: 'blur'}">
                <el-input placeholder="商品sku类别" style="width:80%;" v-model="attributes.name"></el-input><el-button style="margin-left:10px;" @click.prevent="removeAttribute(attributes)">删除</el-button>
                <el-button type="success" @click="saveAttribute(attributes)">保存</el-button>
            </el-form-item>
            <el-form-item>
                <el-button icon="el-icon-plus" @click="addAttribute">新增商品sku类别</el-button>
            </el-form-item>
            <el-form-item
                v-for="(sku, index) in productForm.sku"
                :key="sku.key"
                :label="'商品sku' + index + ':'">
                <p><span>名称：</span> <el-input placeholder="名称" style="width:70%;" v-model="sku.title"></el-input></p>
                <p><span>描述：</span> <el-input placeholder="描述" style="width:70%;" v-model="sku.description"></el-input></p>
                <p><span>价格：</span> <el-input placeholder="价格" style="width:70%;" v-model="sku.price"></el-input></p>
                <p><span>库存：</span> <el-input placeholder="库存" style="width:70%;" v-model="sku.stock"></el-input></p>
                <p><span>颜色：</span>
                    <el-select style="width:70%;" v-model="sku.color" placeholder="请选择颜色">
                        <el-option
                          v-for="item in productForm.images"
                          :key="item.value"
                          :label="item.value"
                          :value="item.value">
                        </el-option>
                    </el-select>
                </p>
                <p v-for="item in productForm.sku[index].attributes">
                    <span v-text="item.name + '：'"></span> <el-input :placeholder="item.name" style="width:70%;" v-model="item.value"></el-input>
                </p>
                <el-button style="margin-left:10px;" @click.prevent="removeSku(sku)">删除</el-button>
            </el-form-item>
            <el-form-item>
                <el-button icon="el-icon-plus" @click="addSku">新增商品sku</el-button>
            </el-form-item>
            <el-form-item>
                <el-button :loading="submiting" type="primary" @click="submitForm('productForm')">确定</el-button>
            </el-form-item>
        </el-form>
        <el-dialog :visible.sync="dialogVisible">
            <img width="100%" :src="dialogImageUrl" alt="">
        </el-dialog>
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
                id:{{$id}},
                title:'',
                product_classify_id:'',
                image:'',
                description:'',
                on_sale:false,
                attributes: [{
                    id:0,
                    product_id:{{$id}},
                    name: '',
                }],
                sku:[],
                colorAttribute:{},
                images:[],
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
            dialogImageUrl: '',
            dialogVisible: false,
            fileList:{},
            imagesValue:'',
        },
        created(){
            this.getSecondRootClassify();
            this.getProduct();
            this.getAttributes();
        },
        methods:{
            updateColor(){
                axios.put('/admin/products/updateColor/'+this.productForm.id,{images:this.productForm.images}).then(res => {
                    this.$message.success('添加颜色成功');
                }).catch(error =>{});
            },
            handleImagesSuccess(res, file,fileList,images){
                images.images.push({"url":res.path});
            },
            // handleImagesSuccess(res, file,fileList,sku){
            //     sku.images.push({"url":res.path});
            // },
            handleRemove(file, fileList) {
                // console.log(file, fileList);
            },
            handlePictureCardPreview(file) {
                this.dialogImageUrl = file.url;
                this.dialogVisible = true;
            },
            addSku(){
                this.productForm.attributes.forEach((item,index)=>{
                    item.value = '';
                });
                let attributes = JSON.parse(JSON.stringify(this.productForm.attributes));
                this.productForm.sku.push({
                    id:0,
                    title: '',
                    description:'',
                    price:0.00,
                    stock:0,
                    color:'',
                    product_id:{{$id}},
                    attributes:attributes,
                    images:[],
                });
            },
            addImages(value){
                // console.log(this.productForm);
                this.productForm.images.push({
                    value:value,
                    images:[],
                });
            },
            removeSku(item){
                var index = this.productForm.sku.indexOf(item)
                if (index !== -1) {
                    this.productForm.sku.splice(index, 1)
                }
            },
            deleteAttributes(attributes){
                axios.delete('/admin/productSkuAttributes/'+attributes.id).then(res => {
                    this.$message.success(res.data.message);
                });
            },
            getAttributes(){
                axios.get('/admin/productSkuAttributes/'+this.productForm.id).then(res => {
                    this.productForm.attributes = res.data.list;
                });
            },
            saveAttribute(attributes){
                axios.post('/admin/productSkuAttributes',attributes).then(res => {
                    this.$message.success(res.data.message);
                }).catch(error => {
                    this.$message.warning('已保存或名字重复!');
                });
            },
            addAttribute(){
                this.productForm.attributes.push({
                    id:0,
                    name: '',
                    product_id:{{$id}},
                });
            },
            removeAttribute(item) {
                this.deleteAttributes(item);
                var index = this.productForm.attributes.indexOf(item)
                if (index !== -1) {
                    this.productForm.attributes.splice(index, 1)
                }
            },
            getProduct(){
                axios.get('/admin/products/'+this.productForm.id).then(res => {
                    this.productForm.id = res.data.list.product.id;
                    this.productForm.title = res.data.list.product.title;
                    this.productForm.product_classify_id = res.data.list.product.product_classify_id;
                    this.productForm.image = res.data.list.product.image;
                    this.productForm.images = res.data.list.product.images;
                    this.productForm.on_sale = res.data.list.product.on_sale;
                    this.productForm.sku = res.data.list.productSkus;
                    ue.ready(function() { 
                        ue.setContent(res.data.list.product.description); 
                    });
                });
                console.log(this.productForm);
            },
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
                // console.log(file, fileList);
            },
            handleSuccess(response, file, fileList){
                this.productForm.image = file.response.path;
            },
            submitForm(formName) {
                this.submiting = true;
                this.productForm.description = ue.getContent();
                this.$refs[formName].validate((valid) => {
                    if (valid) {
                        this.submiting = false;
                        // console.log(this.productForm);return;
                        axios.put('/admin/products/'+this.productForm.id,this.productForm).then(res => {
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