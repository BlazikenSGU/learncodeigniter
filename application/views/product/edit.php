<div class="container">
    <div class="card" style="margin-top: 1rem;">
        <h5 class="card-header">Edit Product</h5>
        <div class="card-body">
            <a href="<?php echo base_url('category/create') ?>" class="btn btn-primary">Create Product</a>
            <a href="<?php echo base_url('product/list') ?>" class="btn btn-success">List Product</a>
            <?php
            if ($this->session->flashdata('success')) {
            ?>
                <div class="alert alert-success"><?php echo $this->session->flashdata('success') ?></div>
            <?php
            } elseif ($this->session->flashdata('error')) {
            ?>
                <div class="alert alert-danger"><?php echo $this->session->flashdata('error') ?></div>
            <?php
            }
            ?>

            <form action="<?php echo base_url('product/update/' . $product->id) ?>" method="POST" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="exampleInputEmail1">Title</label>
                    <input name="title" value="<?= $product->title ?>" type="text" class="form-control" id="slug" onkeyup="ChangeToSlug();" aria-describedby="emailHelp">
                    <?php echo '<span class="text text-danger">' . form_error('title') . '</span>'; ?>
                </div>

                <div class="form-group">
                    <label for="exampleInputEmail1">Quantity</label>
                    <input name="quantity" value="<?= $product->quantity ?>" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                    <?php echo '<span class="text text-danger">' . form_error('quantity') . '</span>'; ?>
                </div>
				<div class="form-group">
                    <label for="exampleInputEmail1">Price</label>
                    <input name="price" value="<?= $product->price ?>" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                    <?php echo '<span class="text text-danger">' . form_error('price') . '</span>'; ?>
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Slug</label>
                    <input name="slug" type="text" value="<?= $product->slug ?>" class="form-control" id="convert_slug" aria-describedby="emailHelp">
                    <?php echo '<span class="text text-danger">' . form_error('slug') . '</span>'; ?>
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Description</label>
                    <input name="description" value="<?= $product->description ?>" type="text" class="form-control" id="exampleInputPassword1">
                    <?php echo '<span class="text text-danger">' . form_error('description') . '</span>'; ?>
                </div>

                <div class="form-group">
                    <label for="exampleInputPassword1">Image</label>
                    <input name="image" type="file" class="form-control-file" id="exampleInputPassword1">
                    <img style="max-width: 150px; max-height: 150px" src="<?php echo base_url('uploads/product/' . $product->image) ?>" alt="">
                    <small><?php if (isset($error)) {
                                echo $error;
                            } ?></small>

                </div>

                <div class="form-group">
                    <label for="exampleFormControlSelect1">Category</label>
                    <select name="category_id" class="form-control" id="exampleFormControlSelect1">
                        <?php
                        foreach ($category as $key => $cate) {
                        ?>
                            <option <?php echo $cate->id == $product->category_id ? 'selected' : '' ?> value="<?= $cate->id ?>"><?= $cate->title ?></option>
                        <?php
                        }
                        ?>
                    </select>
                </div>

                <div class="form-group">
                    <label for="exampleFormControlSelect1">Brand</label>
                    <select name="brand_id" class="form-control" id="exampleFormControlSelect1">
                        <?php
                        foreach ($brand as $key => $bra) {
                        ?>
                            <option <?php echo $bra->id == $product->category_id ? 'selected' : '' ?> value="<?= $bra->id ?>"><?= $bra->title ?></option>
                        <?php
                        }
                        ?>
                    </select>
                </div>

                <div class="form-group">
                    <label for="exampleFormControlSelect1">Status</label>
                    <select name="status" class="form-control" id="exampleFormControlSelect1">
                        <?php
                        if ($product->status == 1) {
                        ?>
                            <option selected value="1">Active</option>
                            <option value="0">Inactive</option>
                        <?php
                        } else {
                        ?>
                            <option value="1">Active</option>
                            <option selected value="0">Inactive</option>
                        <?php } ?>

                    </select>
                </div>

                <button type="submit" class="btn btn-primary">Update</button>
            </form>
        </div>
    </div>
</div>
