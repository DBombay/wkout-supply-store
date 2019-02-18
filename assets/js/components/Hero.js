import React from 'react'
import {Jumbotron} from 'reactstrap'

export default function Hero() {
    return (
        <div className="container-fluid">
            <Jumbotron>
                <h1 className="display-3">Ready for your New Life?</h1>
                <p className="lead">
                    Peruse our selection of cutting-edge fitness equipment and start your journey to a better you!
                </p>
                <hr className="my-2"/>
                <em>
                    We don't do frills here. We don't even have a marketing department or copy editors! All we have is
                    top of the line gear and an excess of exclamation points!!!
                </em>
            </Jumbotron>
        </div>
    )
}