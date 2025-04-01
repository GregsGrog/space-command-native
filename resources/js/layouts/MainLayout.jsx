import React from 'react';
import { Link, router } from '@inertiajs/react'
import { FaBars } from "react-icons/fa";
const MainLayout = ({ children, message }) => {
    return (
        <>
            <div className="drawer">
                <input id="my-drawer" type="checkbox" className="drawer-toggle" />
                <div className="drawer-content">


                    <div className="navbar bg-base-100 shadow-sm">
                        <label htmlFor="my-drawer" className="btn"> <FaBars /></label>
                        <a href={route('dashboard')} className="btn btn-ghost text-xl">Space Traders</a>
                    </div>
                    {message &&
                        <div role="alert" className="alert m-4">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                 className="stroke-primary h-6 w-6 shrink-0">
                                <path strokeLinecap="round" strokeLinejoin="round" strokeWidth="2"
                                      d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                            <span>{message}</span>
                        </div>
                    }
                    {children}
                </div>
                <div className="drawer-side">
                    <label htmlFor="my-drawer" aria-label="close sidebar" className="drawer-overlay"></label>
                    <ul className="menu bg-base-200 text-base-content min-h-full w-80 p-4">
                        <li><a href={route('dashboard')}>Dashboard</a></li>
                        <li><a href={route('settings')}>Settings</a></li>
                    </ul>
                </div>
            </div>

        </>
    );
}

export default MainLayout;
