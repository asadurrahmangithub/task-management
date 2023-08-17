import React from 'react';
import { Link } from 'react-router-dom';

import Logo from '../../../public/frontEnd/images/pod-talk-logo.png';

const Header = () => {
    return (
        <nav className="navbar navbar-expand-lg">
            <div className="container">
                <Link className="navbar-brand me-lg-5 me-0" to="/">
                    <img src={Logo} className="logo-image img-fluid" alt="templatemo pod talk"/>
                </Link>

                <form action="#" method="get" className="custom-form search-form flex-fill me-3" role="search">
                    <div className="input-group input-group-lg">
                        <input name="search" type="search" className="form-control" id="search" placeholder="Search Podcast"
                            aria-label="Search"/>

                        <button type="submit" className="form-control" id="submit">
                            <i className="bi-search"></i>
                        </button>
                    </div>
                </form>

                <button className="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                    aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span className="navbar-toggler-icon"></span>
                </button>

                <div className="collapse navbar-collapse" id="navbarNav">
                    <ul className="navbar-nav ms-lg-auto">
                        <li className="nav-item">
                            <Link className="nav-link" to="/">Home</Link>
                        </li>

                        <li className="nav-item">
                            <Link className="nav-link" to="/blog">Blog</Link>
                        </li>

                        <li className="nav-item ">
                            <Link className="nav-link" to="/listing-page">Listing Page</Link>

                            {/* <ul className="dropdown-menu dropdown-menu-light" aria-labelledby="navbarLightDropdownMenuLink">
                                <li><a className="dropdown-item" href="listing-page.html">Listing Page</a></li>

                                <li><a className="dropdown-item" href="detail-page.html">Detail Page</a></li>
                            </ul> */}
                        </li>

                        <li className="nav-item">
                            <Link className="nav-link" to="/contact">Contact</Link>
                        </li>
                    </ul>

                    <div className="ms-4">
                        <a href="#section_3" className="btn custom-btn custom-border-btn smoothscroll">Get started</a>
                    </div>
                </div>
            </div>
        </nav>
    );
};

export default Header;
