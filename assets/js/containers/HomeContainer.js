import React from 'react'
import {Hero} from "../components"

export default class HomeContainer extends React.Component {
    constructor(props) {
        super(props)
    }

    render() {
        return(
            <div className="container">
                <Hero />
            </div>
        )
    }
}