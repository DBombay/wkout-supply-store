import React from 'react'
import {CategoriesCollection, CreateObjectModal, Hero} from "../components"

export default class HomeContainer extends React.Component {
    constructor(props) {
        super(props);
    }

    render() {
        return(
            <div className="container">
                <Hero />
                <CategoriesCollection />
            </div>
        )
    }
}