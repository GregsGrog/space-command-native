import React, {useState} from "react";
import { FaCoins } from 'react-icons/fa';
import { FaCircleXmark, FaUserPlus, FaArrowRotateLeft, FaCirclePlus  } from "react-icons/fa6";
import axios from "axios";
export default function AgentModule({agents}) {

    const [agentToken, setAgentToken] = useState("");
    const [agentState, setAgentState] = useState(agents);
    const [agentDeletionId, setAgentDeletionId] = useState(agents);

    function openDeletionModal(id){
        setAgentDeletionId(id);
        showDeleteModal(true);
    }


    function createAgent(){
        //check that the token is in the right format
        //submit it
        //remove the token from the state

        axios.post("/create-agent", {
            id: agentToken,
        })
            .then(function (response) {
                setAgentToken("");
                showAgentModal(false);
                setAgentState(response.data);
            })
            .catch(function (error) {
                console.log(error);
            });
        console.log(agentToken);
    }

    function refreshAgent(symbol){

        const buttons =  document.getElementsByClassName("btn-refresh");
        for (const button of buttons) {
            button.disabled = true;
        }


        axios.post("/refresh-agent", {
            symbol: symbol,
        })
            .then(function (response) {
                setAgentState(response.data);
                setTimeout(
                    function() {
                        for (const button of buttons) {
                            button.disabled = false;
                        }
                    }, 2000);
            })
            .catch(function (error) {
                console.log(error);
            });
    }

    function deleteAgent(){

            axios.post("/delete-agent", {
                id: agentDeletionId,
            })
                .then(function (response) {
                    showDeleteModal(false);
                    setAgentState(response.data);
                })
                .catch(function (error) {
                    console.log(error);
                });
    }

    function showAgentModal(toggle){
        if(toggle === true){
            document.getElementById('add_agent_modal').showModal();
        }else{
            document.getElementById('add_agent_modal').close();
        }
    }

    function showDeleteModal(toggle){
        if(toggle === true){
            document.getElementById('delete_agent_modal').showModal();
        }else{
            document.getElementById('delete_agent_modal').close();
        }
    }
    console.log(agents);

    return (
        <div className="card w-auto bg-base-300/90 shadow-sm">
            <div className="card-body">
                <div className="flex justify-between">
                    <h2 className="text-2xl font-bold">Agents</h2>
                    <button className="btn btn-primary"
                            onClick={() => showAgentModal(true)}>Add Agent<FaCirclePlus />
                    </button>
                </div>
                <ul className="list bg-base-100 rounded-box shadow-md mt-3">

                    <li className="p-4 pb-2 text-xs opacity-60 tracking-wide">Currently Tracked Agents</li>
                    {agentState.map((agent, index) => (
                        <li key={index} className="list-row">
                            <div
                                className="text-4xl font-thin opacity-30 tabular-nums">{String(index + 1).padStart(2, '0')}</div>
                            <div className="list-col-grow">
                                <div>{agent.symbol}</div>
                                <div className="text-xs uppercase font-semibold opacity-60">{agent.headquarters}</div>
                            </div>
                            <div className="list-col-grow">
                                <div>Credits</div>
                                <div className="text-xs uppercase font-semibold opacity-60">{agent.credits}</div>
                            </div>

                            <a href={"agent/" + agent.symbol } className="btn btn-square btn-ghost">
                                <svg className="size-[1.2em]" xmlns="http://www.w3.org/2000/svg"
                                     viewBox="0 0 24 24">
                                    <g strokeLinejoin="round" strokeLinecap="round" strokeWidth="2" fill="none"
                                       stroke="currentColor">
                                        <path d="M6 3L20 12 6 21 6 3z"></path>
                                    </g>
                                </svg>
                            </a>
                            <button onClick={(e) => {
                                openDeletionModal(agent.id);
                            }} className="btn btn-square btn-ghost">
                                <FaCircleXmark />
                            </button>
                            <button onClick={(e)=>{ refreshAgent(agent.symbol)}} className="btn btn-square btn-ghost btn-refresh">
                                <FaArrowRotateLeft />
                            </button>
                        </li>

                    ))}
                    {agentState.length === 0 && <li className="list-row">
                        <div className="text-4xl font-thin opacity-30 tabular-nums"></div>
                        <div className="list-col-grow">
                            <div>No Agents have been added.</div>
                        </div>
                    </li>}

                </ul>
                <div className="mt-2">
                    <dialog id="add_agent_modal" className="modal">
                        <div className="modal-box">
                            <h3 className="font-bold text-lg">Add a new Agent.</h3>

                            <label className="input mt-3 w-full">
                                <FaUserPlus className="h-[1em] opacity-50" />
                                <input value={agentToken} onChange={(e) => {
                                    setAgentToken(e.target.value)
                                }} type="text" className="grow" placeholder="agent-token" />
                            </label>
                            <div className="modal-action">

                                <form method="dialog">
                                    <button className="btn">Close</button>
                                </form>
                                <button onClick={() => {
                                    createAgent()
                                }} className="btn btn-primary">Submit Token
                                </button>
                            </div>
                        </div>
                    </dialog>
                    <dialog id="delete_agent_modal" className="modal">
                        <div className="modal-box">
                            <h3 className="font-bold text-lg">Are you sure you want to delete this agent?</h3>
                            <p>This action cannot be reversed</p>
                            <div className="modal-action">

                                <form method="dialog">
                                    <button className="btn">Close</button>
                                </form>
                                <button onClick={() => {
                                    deleteAgent()
                                }} className="btn btn-error">Delete
                                </button>
                            </div>
                        </div>
                    </dialog>
                </div>
            </div>
        </div>
    )
}
