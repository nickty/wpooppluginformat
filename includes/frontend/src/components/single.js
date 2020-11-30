import React, { Component } from 'react'

export class single extends Component {
    render() {
        const { number, status, date_created, customer_note, billing, payment_method, line_items, discount_total, shipping_lines  } = this.props.order; 
        return (
            <div>
                <h2> Product Number:  { number }</h2>
                <p>Order Status: {status}</p>
                <p>Order Date: {date_created}</p>
                <p>Customer Note: {customer_note}</p>

                <p>Last Name: {billing.last_name}</p>
                <p>Post Code: {billing.post_code}</p>
                <p>Email: {billing.email}</p>
                <p>Phone: {billing.phone}</p>

                <p>Payment Method: {payment_method}</p>

                <p>Product Name: {line_items.name}</p>
                <p>Item Quantity: {line_items.quantity}</p>
                <p>Item Cost: {line_items.total}</p>

                <p>Item Cost: {discount_total}</p>
                <p>Shipping Method Title: { shipping_lines }</p>
            </div>
        )
    }
}

export default single
