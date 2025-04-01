
import { Head, Link, usePage } from '@inertiajs/react';
import MainLayout from "@/layouts/MainLayout";
import AgentModule from '@/pages/partials/AgentModule.jsx';
import { FaCoins } from "react-icons/fa";
export default function Dashboard({agents}) {
    console.log(agents);
    return (
        <MainLayout
            message={"Welcome Commander, you are now in control."}
        >

            <div className="grid grid-cols-4 gap-4 m-4">
                <AgentModule
                agents={agents}
                />


            </div>


        </MainLayout>
    );
}
