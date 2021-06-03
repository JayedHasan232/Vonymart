<nav class="accordion sidebar" id="sidebarAccordion">
    <ul class="sb-list">
        <li class="sb-item" id="items">
            <a href="{{ route('admin.dashboard') }}" class="sb-link active">Dashboard</a>
        </li>
        <li class="sb-item" id="products">
            <a class="sb-link" data-bs-toggle="collapse" data-bs-target="#collapseProduct" aria-expanded="true" aria-controls="collapseProduct">Product</a>
            <ul class="collapse sbc-list" id="collapseProduct" aria-labelledby="headingProduct" data-bs-parent="#sidebarAccordion">
                <li class="sbc-item"><a href="{{ route('admin.product.create') }}" class="sbc-link">Create</a></li>
            </ul>
        </li>
        <li class="sb-item" id="brand">
            <a class="sb-link" data-bs-toggle="collapse" data-bs-target="#collapseBrand" aria-expanded="true" aria-controls="collapseBrand">Brand</a>
            <ul class="collapse sbc-list" id="collapseBrand" aria-labelledby="headingBrand" data-bs-parent="#sidebarAccordion">
                <li class="sbc-item"><a href="{{ route('admin.product.brand.create') }}" class="sbc-link">Create</a></li>
                <li class="sbc-item"><a href="{{ route('admin.product.brand.index') }}" class="sbc-link">Index</a></li>
            </ul>
        </li>
        <li class="sb-item" id="category">
            <a class="sb-link" data-bs-toggle="collapse" data-bs-target="#collapseCategory" aria-expanded="true" aria-controls="collapseCategory">Category</a>
            <ul class="collapse sbc-list" id="collapseCategory" aria-labelledby="headingCategory" data-bs-parent="#sidebarAccordion">
                <li class="sbc-item"><a href="{{ route('admin.product.category.create') }}" class="sbc-link">Create</a></li>
                <li class="sbc-item"><a href="{{ route('admin.product.category.index') }}" class="sbc-link">Index</a></li>
            </ul>
        </li>
        <li class="sb-item" id="sub-category">
            <a class="sb-link" data-bs-toggle="collapse" data-bs-target="#collapseSubCategory" aria-expanded="true" aria-controls="collapseSubCategory">Sub Category</a>
            <ul class="collapse sbc-list" id="collapseSubCategory" aria-labelledby="headingSubCategory" data-bs-parent="#sidebarAccordion">
                <li class="sbc-item"><a href="{{ route('admin.product.sub-category.create') }}" class="sbc-link">Create</a></li>
                <li class="sbc-item"><a href="{{ route('admin.product.sub-category.index') }}" class="sbc-link">Index</a></li>
            </ul>
        </li>
        <li class="sb-item"><a href="#" class="sb-link">Users</a></li>
    </ul>
</nav>