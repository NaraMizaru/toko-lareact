const Sidebar = () => {
    return (
        <ul
            className="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion"
            id="accordionSidebar"
        >
            <a
                className="sidebar-brand d-flex align-items-center justify-content-center"
                href=""
            >
                <div className="sidebar-brand-icon rotate-n-15">
                    <i className="fa-regular fa-fw fa-envelope"></i>
                </div>
                <div className="sidebar-brand-text mx-3">
                    E-Voting <sup>2.0</sup>
                </div>
            </a>

            <hr className="sidebar-divider my-0" />

            <li className="nav-item">
                <a href="" className="nav-link">
                    <i className="fa-regular fa-fw fa-house"></i>
                    <span>Dashboard</span>
                </a>
            </li>

            <hr className="sidebar-divider" />

            <div className="sidebar-heading">Kelola</div>
            <li className="nav-item">
                <a href="" className="nav-link">
                    <i className="fa-regular fa-fw fa-school"></i>
                    <span>Kelola Kategori</span>
                </a>
            </li>
            <li className="nav-item">
                <a href="" className="nav-link">
                    <i className="fa-regular fa-fw fa-school"></i>
                    <span>Kelola Perusahaan</span>
                </a>
            </li>
            <li className="nav-item">
                <a href="" className="nav-link">
                    <i className="fa-regular fa-fw fa-school"></i>
                    <span>Kelola Kasir</span>
                </a>
            </li>

            <hr className="sidebar-divider d-none d-md-block" />

            <div className="text-center d-none d-md-inline">
                <button
                    className="rounded-circle border-0"
                    id="sidebarToggle"
                ></button>
            </div>
        </ul>
    );
};

export default Sidebar;
