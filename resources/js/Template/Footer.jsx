const Footer = () => {
  return (
    <footer className="sticky-footer bg-white">
      <div className="row">
        <div className="col-6">
          <div className="container my-auto">
            <div className="copyright text-left my-auto">
                <span>Copyright &copy; <a href="" target="_blank">RPL Produksi</a> </span>
            </div>
          </div>
        </div>
        <div className="col-6">
          <div className="container my-auto">
            <div className="copyright text-right my-auto">
                <span>Design By <a href="https://github.com/aleckrh/laravel-sb-admin-2" target="_blank">SB Admin <sup>2</sup> </a></span>
            </div>
          </div>
        </div>
      </div>
    </footer>
  )
}

export default Footer;