import React from 'react';


export default function MyModal(props) {


    return (
        <>
            <div className="w-full h-full bg-white rounded shadow hover:shadow-lg">
                <div className="w-full h-64 bg-cover bg-center rounded-t" style={{ backgroundImage: 'url('+ props.image +')' }}></div>
                <div className="px-6 py-4">
                    <div className="mb-2 text-xl font-bold text-gray-800">{props.name}</div>
                    <p className="text-base text-gray-700">Temps : {props.time} H</p>
                    <p className="text-base text-gray-700">{props.desc}.</p>
                </div>
            </div>
        </>
    );
}
