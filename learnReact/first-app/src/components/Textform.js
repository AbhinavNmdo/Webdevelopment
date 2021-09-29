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

    const handleForClear = () => {
        setText('');
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
        </div>
        <button className="btn btn-primary m-3" onClick={handleForUpper}>Convert to UpperCase</button>
        <button className="btn btn-primary m-3" onClick={handleForLower}>Convert to LowerCase</button>
        <button className="btn btn-danger m-3" onClick={handleForClear}>Clear All</button>
        <h4 align="center">{text.length} Characters</h4>
        <h4 align="center">{text.split(" ").length} Words</h4>
        <h4 align="center">{0.008 * text.split(" ").length} Minutes to Read</h4>
        <h2 align="center" className="my-4">Preview</h2>
        <h5 align="center">{text}</h5>
        </>
    );
}
