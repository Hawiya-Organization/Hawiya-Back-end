import gensim
from arabert.preprocess import ArabertPreprocessor
from fastapi import FastAPI
from pydantic import BaseModel

app = FastAPI()

model_name="bert-base-arabert"
arabert_prep = ArabertPreprocessor(model_name=model_name)

model = gensim.models.Doc2Vec.load('models/bert_doc2vec_model_dm0_mean1_dbow_words1_epochs20.model')

class Prompt(BaseModel):
    prompt: str

@app.get('/')
def root():
    return {"Task:", "Ro7e ta5dame Raid"}

@app.post('/search')
async def search(data: Prompt):
    prompt = data.prompt
    clean_prompt = [token for token in arabert_prep.preprocess(prompt).split() if '+' not in token]
    inferred_vector = model.infer_vector(clean_prompt)
    sims = model.dv.most_similar([inferred_vector], topn=10)
    return sims

@app.post('/search_fake')
async def search_fake(data: Prompt):
    return [
    [
        "1124313",
        0.2667000889778137
    ],
    [
        "1136946",
        0.2421523481607437
    ],
    [
        "341759",
        0.2410522997379303
    ],
    [
        "1131302",
        0.24104520678520203
    ],
    [
        "1139187",
        0.24070407450199127
    ],
    [
        "1132849",
        0.23787502944469452
    ],
    [
        "1147952",
        0.23682621121406555
    ],
    [
        "1155844",
        0.2361346334218979
    ],
    [
        "379573",
        0.23545262217521667
    ],
    [
        "318613",
        0.23470106720924377
    ]
]