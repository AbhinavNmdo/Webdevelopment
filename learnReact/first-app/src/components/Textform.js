import React, {useState} from "react";

export default function Textform(props) {
    const [text, setText] = useState('Enter Text Here');
    
    const handleOnChange = (event) => {
        setText(event.target.value);
    }

    const handleForUpper = () => {
        let upperText = text.toUpperCase();
        setText(upperText);
    }

    const handleForLower = () => {
        let lowerText = text.toLowerCase();
        setText(lowerText);
    }

    return (
        <>
        <div className="form-floating">
            <textarea
            className="form-control"
            value={text}
            onChange={handleOnChange}
            placeholder="Leave a comment here"
            id="textarea"
            ></textarea>
            <label htmlFor="textarea">Type Here</label>
            <button className="btn btn-primary m-4" onClick={handleForUpper}>Convert to UpperCase</button>
            <button className="btn btn-primary m-4" onClick={handleForLower}>Convert to LowerCase</button>
        </div>
        </>
    );
}
