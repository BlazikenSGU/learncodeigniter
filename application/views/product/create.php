<div class="container">
    <div class="card" style="margin-top: 1rem;">
        <h5 class="card-header">Create Product</h5>
        <div class="card-body">
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

            <form action="<?php echo base_url('product/store') ?>" method="POST" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="exampleInputEmail1">Title</label>
                    <input name="title" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                    <?php echo '<span class="text text-danger">' . form_error('title') . '</span>'; ?>
                </div>

                <div class="form-group">
                    <label for="exampleInputEmail1">Quantity</label>
                    <input name="quantity" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                    <?php echo '<span class="text text-danger">' . form_error('quantity') . '</span>'; ?>
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Slug</label>
                    <input name="slug" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                    <?php echo '<span class="text text-danger">' . form_error('slug') . '</span>'; ?>
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Description</label>
                    <input name="description" type="text" class="form-control" id="exampleInputPassword1">
                    <?php echo '<span class="text text-danger">' . form_error('description') . '</span>'; ?>
                </div>

                <div class="form-group">
                    <label for="exampleInputPassword1">Image</label>
                    <input name="image" type="file" class="form-control-file" id="exampleInputPassword1">
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
                            <option value="<?= $cate->id ?>"><?= $cate->title ?></option>
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
                            <option value="<?= $bra->id ?>"><?= $bra->title ?></option>
                        <?php
                        }
                        ?>
                    </select>
                </div>

                <div class="form-group">
                    <label for="exampleFormControlSelect1">Status</label>
                    <select name="status" class="form-control" id="exampleFormControlSelect1">
                        <option value="1">Active</option>
                        <option value="0">Inactive</option>

                    </select>
                </div>

                <button type="submit" class="btn btn-primary">Add</button>
            </form>
        </div>
    </div>
</div>