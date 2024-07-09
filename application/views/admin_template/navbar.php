<div class="container">

    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="#"></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
                </li>

                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-expanded="false">
                        Brand
                    </a>
                    <div class="dropdown-menu">
                        <a class="dropdown-item" href="<?php echo base_url('brand/create'); ?>">Create</a>
                        <a class="dropdown-item" href="<?php echo base_url('brand/list'); ?>">List</a>
                    </div>
                </li>

                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-expanded="false">
                        <?php echo $this->session->userdata('LoggedIn')['username'] ?>
                    </a>
                    <div class="dropdown-menu">
                        <a class="dropdown-item" href="<?php echo base_url('logout'); ?>">Logout</a>

                    </div>
                </li>

            </ul>

        </div>
    </nav>
</div>