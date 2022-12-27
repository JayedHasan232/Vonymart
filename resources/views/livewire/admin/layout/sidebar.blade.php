<nav class="accordion sidebar" id="sidebarAccordion">
    <ul class="sb-list">
        <li class="sb-item" id="items">
            <a href="{{ route('admin.dashboard') }}" class="sb-link active">Dashboard</a>
        </li>
        <li class="sb-item" id="items">
            <a href="{{ route('admin.orders.index') }}" class="sb-link">Orders</a>
        </li>
        <li class="sb-item" id="products">
            <a class="sb-link" data-bs-toggle="collapse" data-bs-target="#collapseProduct" aria-expanded="true"
                aria-controls="collapseProduct">Product</a>
            <ul class="collapse sbc-list" id="collapseProduct" aria-labelledby="headingProduct"
                data-bs-parent="#sidebarAccordion">
                <li class="sbc-item"><a href="{{ route('admin.product.create') }}" class="sbc-link">Create</a></li>
                <li class="sbc-item"><a href="{{ route('admin.product.index') }}" class="sbc-link">Index</a></li>
            </ul>
        </li>
        <li class="sb-item" id="brand">
            <a class="sb-link" data-bs-toggle="collapse" data-bs-target="#collapseBrand" aria-expanded="true"
                aria-controls="collapseBrand">Brand</a>
            <ul class="collapse sbc-list" id="collapseBrand" aria-labelledby="headingBrand"
                data-bs-parent="#sidebarAccordion">
                <li class="sbc-item"><a href="{{ route('admin.product.brand.create') }}" class="sbc-link">Create</a>
                </li>
                <li class="sbc-item"><a href="{{ route('admin.product.brand.index') }}" class="sbc-link">Index</a></li>
            </ul>
        </li>
        <li class="sb-item" id="category">
            <a class="sb-link" data-bs-toggle="collapse" data-bs-target="#collapseCategory" aria-expanded="true"
                aria-controls="collapseCategory">Category</a>
            <ul class="collapse sbc-list" id="collapseCategory" aria-labelledby="headingCategory"
                data-bs-parent="#sidebarAccordion">
                <li class="sbc-item"><a href="{{ route('admin.product.category.create') }}" class="sbc-link">Create</a>
                </li>
                <li class="sbc-item"><a href="{{ route('admin.product.category.index') }}" class="sbc-link">Index</a>
                </li>
            </ul>
        </li>
        <li class="sb-item" id="sub-category">
            <a class="sb-link" data-bs-toggle="collapse" data-bs-target="#collapseSubCategory" aria-expanded="true"
                aria-controls="collapseSubCategory">Sub Category</a>
            <ul class="collapse sbc-list" id="collapseSubCategory" aria-labelledby="headingSubCategory"
                data-bs-parent="#sidebarAccordion">
                <li class="sbc-item"><a href="{{ route('admin.product.sub-category.create') }}"
                        class="sbc-link">Create</a></li>
                <li class="sbc-item"><a href="{{ route('admin.product.sub-category.index') }}"
                        class="sbc-link">Index</a></li>
            </ul>
        </li>

        <!-- Slider -->
        <li class="sb-item" id="slider">
            <a class="sb-link" data-bs-toggle="collapse" data-bs-target="#collapseSlider" aria-expanded="true"
                aria-controls="collapseSlider">Slider</a>
            <ul class="collapse sbc-list" id="collapseSlider" aria-labelledby="headingSlider"
                data-bs-parent="#sidebarAccordion">
                <li class="sbc-item">
                    <a href="{{ route('admin.slider.create') }}" class="sbc-link">Create</a>
                </li>
                <li class="sbc-item">
                    <a href="{{ route('admin.slider.index') }}" class="sbc-link">Index</a>
                </li>
            </ul>
        </li>

        <!-- Banner -->
        <li class="sb-item" id="slider">
            <a class="sb-link" data-bs-toggle="collapse" data-bs-target="#collapseBanner" aria-expanded="true"
                aria-controls="collapseBanner">Banner</a>
            <ul class="collapse sbc-list" id="collapseBanner" aria-labelledby="headingBanner"
                data-bs-parent="#sidebarAccordion">
                <li class="sbc-item">
                    <a href="{{ route('admin.banner.create') }}" class="sbc-link">Create</a>
                </li>
                <li class="sbc-item">
                    <a href="{{ route('admin.banner.index') }}" class="sbc-link">Index</a>
                </li>
            </ul>
        </li>

        <!-- Pages -->
        <li class="sb-item" id="slider">
            <a class="sb-link" data-bs-toggle="collapse" data-bs-target="#collapsePages" aria-expanded="true"
                aria-controls="collapsePages">Pages</a>
            <ul class="collapse sbc-list" id="collapsePages" aria-labelledby="headingPages"
                data-bs-parent="#sidebarAccordion">
                <li class="sbc-item">
                    <a href="{{ route('admin.page.create') }}" class="sbc-link">Create</a>
                </li>
                <li class="sbc-item">
                    <a href="{{ route('admin.page.index') }}" class="sbc-link">Index</a>
                </li>
            </ul>
        </li>

        <!-- Site Informations -->
        <li class="sb-item" id="items">
            <a href="{{ route('admin.site-info') }}" class="sb-link">Site Informations</a>
        </li>

        {{-- <li class="sb-item"><a href="#" class="sb-link">Users</a></li> --}}
    </ul>
</nav>