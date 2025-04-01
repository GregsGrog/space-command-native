
import { Head, Link, usePage } from '@inertiajs/react';
import MainLayout from "@/layouts/MainLayout";
export default function View({agent}) {
    console.log(agent);
    return (
        <MainLayout
            message={"This is your agent view commander."}
        >
            <h2 className="text-3xl m-4">Ships</h2>
            <div className="grid grid-cols-5 gap-4 m-4">
                {agent.ships.map((ship, index) => (
                    <div className="card w-auto bg-base-300/90 shadow-sm">
                        <div className="card-body">
                            <span className="badge badge-xs badge-warning">{ship.frame_name}</span>
                            <div className="flex justify-between">
                                <h2 className="text-3xl font-bold">{ship.symbol}</h2>
                                <span className="text-xl">{ship.nav_status}</span>
                            </div>
                            <p className="mt-3 mb-3">{ship.frame_description}</p>



                            <i className="text-xs text-gray-400 mt-2">{ship.updated_at}</i>
                        </div>
                    </div>

                ))}


            </div>

        </MainLayout>
    );
}
