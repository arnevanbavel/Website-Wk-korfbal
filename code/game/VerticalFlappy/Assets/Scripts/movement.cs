using UnityEngine;
using System.Collections;

public class movement : MonoBehaviour {

	public float force = 5f;
	bool jumpAble = true;
	public bool power = false;

	// Use this for initialization
	void Start () {
	}
	
	// Update is called once per frame
	void Update () {
		if (Input.GetKey (KeyCode.Space) && jumpAble) 
		{
			this.gameObject.rigidbody2D.velocity = new Vector2(0f, -force);
			jumpAble = false;
			StartCoroutine("mJumpAble");
		}

		if (Input.GetKey(KeyCode.LeftArrow))
		{
			Vector3 position = this.transform.position;
			position.x -=0.1f;
			this.transform.position = position;
		}
		if (Input.GetKey (KeyCode.RightArrow)) {
						Vector3 position = this.transform.position;
			position.x += 0.1f;
						this.transform.position = position;
				}
	}

	IEnumerator mJumpAble()
	{
		power = true;
			yield return new WaitForSeconds(0.5f);
			this.gameObject.rigidbody2D.velocity = new Vector2(0f, force);
			yield return new WaitForSeconds(0.5f);
			this.rigidbody2D.velocity = Vector2.zero;
		power = false;
			jumpAble = true;
	}
}
