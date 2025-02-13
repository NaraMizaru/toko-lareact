import profilePicture from "../../../public/assets/img/avatar-1.png";

const Navbar = () => {
    return (
        <>
            <nav className="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">
                <button
                    id="sidebarToggleTop"
                    className="btn btn-link d-md-none rounded-circle mr-3"
                >
                    <i className="fa-regular fa-bars"></i>
                </button>

                <h5 className="text-primary d-none d-md-block">
                    E-Voting | SMK Negeri 2 Sukabumi
                </h5>

                <ul className="navbar-nav ml-auto">
                    <li className="nav-item dropdown no-arrow">
                        <a
                            className="nav-link dropdown-toggle"
                            href="#"
                            id="userDropdown"
                            role="button"
                            data-toggle="dropdown"
                            aria-haspopup="true"
                            aria-expanded="false"
                        >
                            <span className="mr-2 d-none d-lg-inline text-gray-600 small">
                                Muhamad Hilal
                            </span>
                            <img
                                src={profilePicture}
                                className="img-profile rounded-circle font-weight-bold"
                            ></img>
                        </a>
                        <div
                            className="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                            aria-labelledby="userDropdown"
                        >
                            <a className="dropdown-item" href="">
                                <i className="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                Profile
                            </a>
                            <div className="dropdown-divider"></div>
                            <a
                                className="dropdown-item"
                                href="#"
                                data-toggle="modal"
                                data-target="#logoutModal"
                            >
                                <i className="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                Keluar
                            </a>
                        </div>
                    </li>
                </ul>
            </nav>

            <div
                className="modal fade"
                id="logoutModal"
                tabIndex="-1"
                role="dialog"
                aria-labelledby="logoutModalLabel"
                aria-hidden="true"
            >
                <div
                    className="modal-dialog modal-dialog-centered"
                    role="document"
                >
                    <div className="modal-content">
                        <div className="modal-header">
                            <h5 className="modal-title" id="logoutModalLabel">
                                Yakin Ingin Keluar?
                            </h5>
                            <button
                                className="close"
                                type="button"
                                data-dismiss="modal"
                                aria-label="Close"
                            >
                                <span aria-hidden="true">×</span>
                            </button>
                        </div>
                        <div className="modal-body">
                            Pilih "Keluar" di bawah jika Anda siap mengakhiri
                            sesi Anda saat ini.
                        </div>
                        <div className="modal-footer">
                            <button
                                className="btn btn-link"
                                type="button"
                                data-dismiss="modal"
                            >
                                Batal
                            </button>
                            <form
                                action="{{ route('post.logout') }}"
                                method="POST"
                                className="form-with-loading"
                            >
                                @csrf
                                <button
                                    type="submit"
                                    className="btn btn-danger btn-loading"
                                >
                                    <span className="btn-text">Keluar</span>
                                    <span
                                        className="spinner-border spinner-border-sm d-none"
                                        role="status"
                                    ></span>
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </>
    );
};

export default Navbar;
