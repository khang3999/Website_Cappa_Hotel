import { useState } from "react";
import "../../../css/admin.css"
const BookingContent = ({ bookings }) => {
    return (
        <>
            <div className="container booking-content">
                <h1 className="">Booking</h1>
                <table className="table">
                    <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Customer</th>
                            <th scope="col">Room</th>
                            <th scope="col">Check in</th>
                            <th scope="col">Check out</th>
                            <th scope="col">Status</th>
                            <th scope="col">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        {bookings.map((booking, index) => {
                            return (
                                <tr>
                                    <td scope="row"><span className="position-relative"></span>{booking.id}</td>
                                    <td scope="row">{booking.id}</td>
                                    <td scope="row">{booking.name}</td>
                                    <td scope="row">{booking.checkin}</td>
                                    <td scope="row">{booking.checkout}</td>
                                    <td scope="row"><span className="badge text-bg-primary position-relative p-2">Đơn mới
                                        <span className="position-absolute top-0 start-100 translate-middle p-2 bg-danger border border-light rounded-circle">
                                            <span className="visually-hidden">New alerts</span>
                                        </span></span></td>
                                    <td scope="row">
                                        <button type="button" className="btn btn-outline btn-outline-success"><i className="bi bi-check-lg"></i></button>
                                        <button type="button" className="btn btn-outline btn-outline-danger"><i className="bi bi-x-lg"></i></button>
                                    </td>
                                </tr>
                            )
                        })}

                    </tbody>
                </table>
            </div>
        </>
    )
}

export default BookingContent;