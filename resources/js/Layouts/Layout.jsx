import Footer from "../Template/Footer";
import Navbar from "../Template/Navbar";
import Sidebar from "../Template/Sidebar";

const Layout = ({ children }) => {
    return (
        <div id="wrapper">
            <Sidebar />
            <div id="content-wrapper" class="d-flex flex-column">
                <div id="content">
                    <Navbar />
                    <div class="container-fluid" style="min-height: 100vh">
                        {children}
                    </div>
                </div>
                <Footer />
            </div>
        </div>
    );
};

export default Layout;
